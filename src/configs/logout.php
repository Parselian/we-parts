<?php

    setcookie("id", "", time() - 3600*24*30*12, "/");
    setcookie("hash", "", time() - 3600*24*30*12, "/", null, 1, true);

    header("Location: /");
    exit();