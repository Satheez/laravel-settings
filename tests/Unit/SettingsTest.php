<?php

it('can set and get settings data', static function () {
    settings(['foo' => 'bar']);
    expect(settings('foo'))
        ->toBe(settings_get('foo'))
        ->toBe('bar');

    foreach (range(1, 100) as $i) {
        settings_set("key{$i}", "value{$i}");
        expect(settings("key{$i}"))
            ->toBe(settings_get("key{$i}"))
            ->toBe("value{$i}");
    }
});

it('can get with default settings data', static function () {
    expect(settings_get('unique1', 'default1'))->toBe('default1');
});
