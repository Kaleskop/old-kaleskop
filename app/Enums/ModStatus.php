<?php

namespace App\Enums;

/**
 * Moderation status
 */
abstract class ModStatus {

 const APPROVED = 'approved';
 const PENDING = 'pending';
 const POSTPONED = 'postponed';
 const REJECTED = 'rejected';
 const ILLEGAL = 'illegal';

}
