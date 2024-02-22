<?php

it('it fails dispatching in a loop', function () {


    for ($i = 0; $i < 100000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }

    expect(true)->toBeTrue();
});


it('succeeds with telescope recording disabled', function () {
    \Laravel\Telescope\Telescope::stopRecording();

    for ($i = 0; $i < 100000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }

    \Laravel\Telescope\Telescope::startRecording();

    expect(true)->toBeTrue();
});
