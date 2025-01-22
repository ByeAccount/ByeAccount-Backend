<?php

namespace App\Enum;

enum CategoryEnum: string
{
    case SOCIAL_NETWORK = 'social_network';
    case E_COMMERCE = 'e_commerce';
    case BLOG = 'blog';
    case FORUM = 'forum';
    case PORTFOLIO = 'portfolio';
    case CORPORATE = 'corporate';
    case NEWS = 'news';
    case EDUCATIONAL = 'educational';
    case ENTERTAINMENT = 'entertainment';
    case TRAVEL = 'travel';
    case HEALTH = 'health';
    case REAL_ESTATE = 'real_estate';
    case FINANCE = 'finance';
    case EVENTS = 'events';
    case GAMING = 'gaming';
    case MUSIC = 'music';
    case VIDEO_STREAMING = 'video_streaming';
    case JOB_BOARD = 'job_board';
    case DIRECTORY = 'directory';
    case LANDING_PAGE = 'landing_page';
}
