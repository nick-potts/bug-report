<?php

it('succeeds with telescope recording disabled', function () {

    ini_set('memory_limit', '50M');

    \Laravel\Telescope\Telescope::stopRecording();
    for ($i = 0; $i < 5000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }
    \Laravel\Telescope\Telescope::startRecording();

    expect(true)->toBeTrue();
});

it('succeeds with 250mb', function () {

    ini_set('memory_limit', '250M');

    for ($i = 0; $i < 5000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }

    expect(true)->toBeTrue();
});


it('fails with recording enabled', function () {

    ini_set('memory_limit', '50M');

    for ($i = 0; $i < 5000; $i++) {
        \App\Jobs\BlankJob::dispatch();
    }

    expect(true)->toBeTrue();
});

it('fails because telescope entries', function () {

    ini_set('memory_limit', '50M');

    $content = ['key' => str_repeat('a', 100000)];

    for ($i = 0; $i < 5000; $i++) {
        \Laravel\Telescope\Telescope::recordJob(new \Laravel\Telescope\IncomingEntry($content, \Illuminate\Support\Str::uuid()));
    }

    expect(true)->toBeTrue();
});




