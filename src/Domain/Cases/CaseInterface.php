<?php

namespace App\Domain\Cases;

interface CaseInterface
{
    /**
     * @return void
     */
    public function execute(): void;
}