<?php

namespace App\Data;

enum SelectionType
{
    case Website;
    case VCard;
    case BusinessPage;
    case Menu;
    case Media;
    case File;
    case Location;
    case WiFi;
    case Email;
    case AppStore;
    case Text;
    case Bitcoin;
}
