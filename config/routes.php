<?php
return [
    "/" => ["controller" => "App\Controller\PageController", "action" => "home"],
    "/prestations/" => ["controller" => "App\Controller\PageController", "action" => "prestations"],
    "/tarifs/" => ["controller" => "App\Controller\PageController", "action" => "tarifs"],
    "/contact/" => ["controller" => "App\Controller\PageController", "action" => "contact"],
    "/login/" => ["controller" => "App\Controller\PageController", "action" => "login"],
    "/logout/" => ["controller" => "App\Controller\PageController", "action" => "logout"],
    "/dashboard/" => ["controller" => "App\Controller\PageController", "action" => "dashboard"],

    "/admin/add-tarif/" => [
        "controller" => "App\Controller\Controller",
        "action" => "addTarif"
    ],
    "/admin/update-tarif/" => [
        "controller" => "App\Controller\Controller",
        "action" => "updateTarif"
    ],
    "/admin/delete-tarif/" => [
        "controller" => "App\Controller\Controller",
        "action" => "deleteTarif"
    ],
    "/contact-submit/" => [
        "controller" => "App\Controller\Controller",
        "action" => "submitContactForm"
    ],
    "/admin/mark-message-read/" => [
        "controller" => "App\Controller\Controller",
        "action" => "markMessageAsRead"
    ],
    "/admin/delete-message/" => [
        "controller" => "App\Controller\Controller",
        "action" => "deleteMessage"
    ],
    "/admin/upload-photo/" => [
        "controller" => "App\Controller\Controller",
        "action" => "uploadPhoto"
    ],
    "/admin/delete-photo/" => [
        "controller" => "App\Controller\Controller",
        "action" => "deletePhoto"
    ],


];
