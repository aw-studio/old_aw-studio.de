# Best Practises

## Use Lookup Tables

::: danger Bad

```php
if($order->product->option->type === 'pdf'){
    $type = 'book';
} else if($order->product->option->type === 'ebpub'){
    $type = 'book';
} else if($order->product->option->type === 'license'){
    $type = 'license';
} else if($order->product->option->type === 'artwork'){
    $type = 'creative';
}
```

:::
::: tip Good

```php
$type = [
    'pdf' => 'book',
    'ebpub' => 'book',
    'license' => 'license',
    'artwork' => 'creative',
][$order->product->option->type];
```

:::
