<?php

require __DIR__ . '/autoload.php';

$service = new TrafficUsageService(new SampleTrafficUsageDao());

echo "Social media lovers:\n";
foreach ($service->socialMediaLovers(97, 4) as $user) {
    echo $user . "\n";
}
echo "Download lovers:\n";
foreach ($service->downloadLovers(97, 4) as $user) {
    echo $user . "\n";
}
