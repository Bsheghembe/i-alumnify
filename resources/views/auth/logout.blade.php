<?php

// partial in app/resources/views/auth
// uses Laravel Collective Forms & HTML package
// http://laravelcollective.com/docs/5.1/html

{!! Form::open([
    'route' => 'logout.post',
    'name' => 'logout-form',
    'id' => 'logout-form',
]) !!}

{!! Form::button('Log Out', [
    'type' => 'submit'
]) !!}

{!! Form::close() !!}