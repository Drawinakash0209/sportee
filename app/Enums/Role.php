<?php
namespace app\Enums;
enum Role : int{
    case SuperAdministrator = 1;
    case User = 2;
    case moderator = 3;
    case MarketingManager = 4;
}