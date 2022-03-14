<?php

function checkLoginHelper()
{
    if (session()->get("is_login") === false) {
        redirect("/login");
    }
}
