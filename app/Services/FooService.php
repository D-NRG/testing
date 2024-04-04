<?php

namespace App\Services;

class FooService
{
    public function makeFoo ($request = null) {
        //если ничего не передавать в метод - то реквест будет пустота, если передашь - будет реквест
        // делаем свои дела и возвращаем результат
        return $request;
    }
}
