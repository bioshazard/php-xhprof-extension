<?php

$tracing = 0;

// Use kill signals to toggle tracing
pcntl_async_signals(true);

// Toggle tracing with `kill -USR1 $pid`
// Great for long running CLI jobs when you don't know what they are up to
pcntl_signal(10, function ($signo) {
  global $tracing;
  if ($tracing == 0) {
    tideways_xhprof_enable();
      // TODO get cpu amount and mem? FLAGS?
    $tracing = 1;
  } else {
    $result = tideways_xhprof_disable();
    file_put_contents('/dev/shm/xh.out', serialize($result));
    $tracing = 0;
  }
});

?>
