# LARAVEL

## Make request with Tinker
```bash
app()->handle(Request::create('/v1/check-in/themes/100002', 'GET', []));
```

## Resolve a class instance out of the container
```bash
$b = app()->make('Butler\CheckInOnline\Theme\Application\Update\ThemeCollectionUpdater');
$b->__invoke(100001);
```


# GIT

## Squash your latests commits into one
```bash
git rebase -i HEAD~4
```
