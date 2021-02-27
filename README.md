## Code to test the issue with

```php
$transaction = new Transaction();
$transaction->reference = 1;
$transaction->save();

// state is 'draft', as expected

$transaction->state->transitionTo(ProcessingState::class);
$transaction->save();

// state is still 'draft', but it should be 'processing'
```
