<?php

namespace A4Anthony\WherebyLaravel;

use A4Anthony\WherebyLaravel\Repositories\Eloquent\MeetingRepository;

class WherebyLaravel
{
    /**
     * @var \A4Anthony\WherebyLaravel\Repositories\Eloquent\MeetingRepository
     */
    private $meetingRepository;

    /**
     * WherebyLaravel constructor.
     */
    public function __construct()
    {
        $this->meetingRepository = new MeetingRepository();
    }

    /**
     * Create a new meeting
     *
     * @param $data
     *
     * @return mixed
     */
    public function createMeeting($data)
    {
        return $this->meetingRepository->create($data);
    }

    /**
     * Get a meeting
     *
     * @param $meetingId
     *
     * @return mixed
     */
    public function getMeeting($meetingId)
    {
        return $this->meetingRepository->getMeeting($meetingId);
    }
}
