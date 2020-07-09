<?php

use Waka\Wcms\Models\Solution;

Route::get('api/solution', function () {
    return Solution::all();
});
