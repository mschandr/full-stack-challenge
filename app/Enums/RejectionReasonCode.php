<?php

namespace App\Enums;

enum RejectionReasonCode: string
{
    case UNDERQUALIFIED = 'underqualified';
    case LACKS_SKILLS = 'lacks_skills';
    case FAILED_ASSESSMENT = 'failed_assessment';
    case POOR_COMMUNICATION = 'poor_communication';
    case CULTURAL_MISMATCH = 'cultural_mismatch';
    case SALARY_MISMATCH = 'salary_mismatch';
    case SCHEDULE_CONFLICT = 'schedule_conflict';
    case BACKGROUND_ISSUE = 'background_issue';
    case OVERQUALIFIED = 'overqualified';
    case NOT_ROLE_FIT = 'not_role_fit';
    case OTHER = 'other';

    public function prompt(): string
    {
        return match($this) {
            self::UNDERQUALIFIED => 'Kindly inform the applicant they did not meet the minimum required qualifications for the role.',
            self::LACKS_SKILLS => 'The applicant was missing key technical or domain-specific skills for this position.',
            self::FAILED_ASSESSMENT => 'They did not pass the technical or role-specific assessment.',
            self::POOR_COMMUNICATION => 'The candidate struggled with communication during the interview process.',
            self::CULTURAL_MISMATCH => 'They were not the right cultural fit for the team or company.',
            self::SALARY_MISMATCH => 'The applicant’s compensation expectations could not be met.',
            self::SCHEDULE_CONFLICT => 'Their availability or start date was not a match for this role.',
            self::BACKGROUND_ISSUE => 'An issue arose during reference or background checks.',
            self::OVERQUALIFIED => 'They were determined to be overqualified for this particular position.',
            self::NOT_ROLE_FIT => 'This specific role was not deemed the right fit for them.',
            self::OTHER => 'A generic rejection message should be generated as the reason was not specified.',
        };
    }
}
