<?php

namespace DTApi\Http\Controllers;

use App\Http\Requests\Bookings\AcceptJobFormRequest;
use App\Http\Requests\Bookings\CancelJobFormRequest;
use App\Http\Requests\Bookings\CustomerNotCallFormRequest;
use App\Http\Requests\Bookings\DistanceFeedFormRequest;
use App\Http\Requests\Bookings\EndJobFormRequest;
use App\Http\Requests\Bookings\FilterHistoryFormRequest;
use App\Http\Requests\Bookings\JobEmailFormRequest;
use App\Http\Requests\Bookings\ReopenFormRequest;
use App\Http\Requests\Bookings\ResendNotificationFormRequest;
use App\Http\Requests\Bookings\ResendSMSNotificationFormRequest;
use App\Http\Requests\Bookings\StoreFormRequest;
use App\Http\Requests\Bookings\UpdateFormRequest;
use DTApi\Repository\BookingRepository;

/**
 * Class BookingController
 * @package DTApi\Http\Controllers
 */
class BookingController extends Controller
{

    /**
     * @var BookingRepository
     */
    protected $repository;

    /**
     * BookingController constructor.
     * @param BookingRepository $bookingRepository
     */
    public function __construct(BookingRepository $bookingRepository)
    {
        $this->repository = $bookingRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        if ($user_id = request()->get('user_id')) {

            $response = $this->repository->getUsersJobs($user_id);

        } elseif (
            auth()->user()->user_type == config('app.admin_role_id') || 
            auth()->user()->user_type == config('app.super_admin_role_id')
        ) {

            $response = $this->repository->getAll(request());

        }

        $response = $this->repository->

        return response($response);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $job = $this->repository->with('translatorJobRel.user')->find($id);

        return response($job);
    }

    /**
     * @param StoreFormRequest $request
     * @return mixed
     */
    public function store(StoreFormRequest $request)
    {
        $response = $this->repository->store(auth()->user(), $request->validated());

        return response($response);
    }

    /**
     * @param $id
     * @param UpdateFormRequest $request
     * @return mixed
     */
    public function update($id, UpdateFormRequest $request)
    {
        $response = $this->repository->updateJob(
            $id, 
            array_except($request->validated(), ['_token', 'submit']), 
            auth()->user()
        );

        return response($response);
    }

    /**
     * @param JobEmailFormRequest $request
     * @return mixed
     */
    public function immediateJobEmail(JobEmailFormRequest $request)
    {
        $response = $this->repository->storeJobEmail($request->validated());

        return response($response);
    }

    /**
     * @param FilterHistoryFormRequest $request
     * @return mixed
     */
    public function getHistory(FilterHistoryFormRequest $request)
    {
        if($user_id = $request->get('user_id')) {

            $response = $this->repository->getUsersJobsHistory($user_id, $request->validated());
            return response($response);
        }

        return null;
    }

    /**
     * @param AcceptJobFormRequest $request
     * @return mixed
     */
    public function acceptJob(AcceptJobFormRequest $request)
    {
        $response = $this->repository->acceptJob($request->validated(), auth()->user());

        return response($response);
    }

    /**
     * @param AcceptJobFormRequest $request
     * @return mixed
     */
    public function acceptJobWithId(AcceptJobFormRequest $request)
    {
        $jobId = $request->get('job_id');
        $response = $this->repository->acceptJobWithId($jobId, auth()->user());

        return response($response);
    }

    /**
     * @param CancelJobFormRequest $request
     * @return mixed
     */
    public function cancelJob(CancelJobFormRequest $request)
    {
        $response = $this->repository->cancelJobAjax($request->validated(), auth()->user());

        return response($response);
    }

    /**
     * @param EndJobFormRequest $request
     * @return mixed
     */
    public function endJob(EndJobFormRequest $request)
    {
        $response = $this->repository->endJob($request->validated());

        return response($response);
    }

    /**
     * @param CustomerNotCallFormRequest $request
     * @return mixed
     */
    public function customerNotCall(CustomerNotCallFormRequest $request)
    {
        $response = $this->repository->customerNotCall($request->validated());

        return response($response);
    }

    /**
     * @return mixed
     */
    public function getPotentialJobs()
    {
        $response = $this->repository->getPotentialJobs(auth()->user());

        return response($response);
    }

    /**
     * @param DistanceFeedFormRequest $request
     * @return mixed
     */
    public function distanceFeed(DistanceFeedFormRequest $request)
    {
        $response = $this->repository->distanceFeed($request->validated())

        return response($response);
    }

    /**
     * @param ReopenFormRequest $request
     * @return mixed
     */
    public function reopen(ReopenFormRequest $request)
    {
        $response = $this->repository->reopen($request->validated());

        return response($response);
    }

    /**
     * @param ResendNotificationFormRequest $request
     * @return mixed
     */
    public function resendNotifications(ResendNotificationFormRequest $request)
    {
        $data = $request->validated();
        $job = $this->repository->find($data['jobid']);
        $job_data = $this->repository->jobToData($job);
        $this->repository->sendNotificationTranslator($job, $job_data, '*');

        return response(['success' => 'Push sent']);
    }

    /**
     * Sends SMS to Translator
     * @param ResendSMSNotificationFormRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resendSMSNotifications(ResendSMSNotificationFormRequest $request)
    {
        $data = $request->validated();
        $job = $this->repository->find($data['jobid']);
        $job_data = $this->repository->jobToData($job);

        try {
            $this->repository->sendSMSNotificationToTranslator($job);
            return response(['success' => 'SMS sent']);
        } catch (\Exception $e) {
            return response(['success' => $e->getMessage()]);
        }
    }
}
