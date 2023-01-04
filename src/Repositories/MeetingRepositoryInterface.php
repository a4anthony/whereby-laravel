<?php

namespace A4Anthony\WherebyLaravel\Repositories;

interface MeetingRepositoryInterface
{
    public function create($data);

    public function getMeeting($meetingId);

    public function webhook();
}
