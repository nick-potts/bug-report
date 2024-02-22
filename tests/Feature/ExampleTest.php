<?php

it('succeeds with telescope recording disabled', function () {

    //
    ini_set('memory_limit', '50M');

    \Laravel\Telescope\Telescope::stopRecording();
    for ($i = 0; $i < 5000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }
    \Laravel\Telescope\Telescope::startRecording();

    expect(true)->toBeTrue();
});

it('it succeeds with 250mb', function () {

    ini_set('memory_limit', '250M');

    for ($i = 0; $i < 5000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }

    expect(true)->toBeTrue();
});


it('it fails dispatching in a loop', function () {

    ini_set('memory_limit', '50M');

    for ($i = 0; $i < 5000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }

    expect(true)->toBeTrue();
});




