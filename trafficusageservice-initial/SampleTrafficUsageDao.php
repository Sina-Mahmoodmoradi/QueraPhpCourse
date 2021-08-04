<?php

class SampleTrafficUsageDao implements TrafficUsageDao
{
    public function loadAll()
    {
        $user_a100 = new User('a100', 'Ali', 20);
        $user_a101 = new User('a101', 'Hasan', 19);
        $user_a102 = new User('a102', 'Mehri', 35);
        $user_a103 = new User('a103', 'Babak', 54);
        $user_a104 = new User('a104', 'Sara', 22);
        $user_a105 = new User('a105', 'Reza', 33);
        $user_a106 = new User('a106', 'Javad', 44);
        $user_a107 = new User('a107', 'Mohammad', 55);
        $user_a108 = new User('a108', 'Ali', 18);
        $user_a109 = new User('a109', 'Elahe', 29);

        $traffic_usages = [
            new TrafficUsage($user_a100, true, false, 100, '97/04/01'), new TrafficUsage($user_a100, false, true, 150, '97/04/01'),
            new TrafficUsage($user_a100, false, false, 100, '97/04/03'), new TrafficUsage($user_a100, true, true, 100, '97/04/04'),
            new TrafficUsage($user_a100, true, false, 100, '97/06/01'), new TrafficUsage($user_a100, false, true, 150, '97/06/01'),
            
            new TrafficUsage($user_a101, true, false, 90, '97/04/01'), new TrafficUsage($user_a101, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a101, true, false, 90, '97/05/01'), new TrafficUsage($user_a101, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a102, true, false, 90, '97/04/01'), new TrafficUsage($user_a102, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a102, true, false, 90, '97/05/01'), new TrafficUsage($user_a102, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a103, true, false, 100, '97/04/01'), new TrafficUsage($user_a103, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a103, true, false, 100, '97/05/01'), new TrafficUsage($user_a103, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a104, true, false, 100, '97/04/01'), new TrafficUsage($user_a104, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a104, true, false, 100, '97/05/01'), new TrafficUsage($user_a104, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a105, true, false, 100, '97/04/01'), new TrafficUsage($user_a105, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a105, true, false, 100, '97/05/01'), new TrafficUsage($user_a105, false, true, 100, '97/05/01'),
            new TrafficUsage($user_a105, true, false, 100, '97/06/01'), new TrafficUsage($user_a105, false, true, 100, '97/06/01'),
            
            new TrafficUsage($user_a106, true, false, 100, '97/04/01'), new TrafficUsage($user_a106, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a106, true, false, 100, '97/05/01'), new TrafficUsage($user_a106, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a107, true, false, 100, '97/04/01'), new TrafficUsage($user_a107, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a107, true, false, 100, '97/05/01'), new TrafficUsage($user_a107, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a108, true, false, 100, '97/04/01'), new TrafficUsage($user_a108, false, true, 100, '97/04/01'),
            new TrafficUsage($user_a108, true, false, 100, '97/05/01'), new TrafficUsage($user_a108, false, true, 100, '97/05/01'),
            
            new TrafficUsage($user_a109, true, false, 400, '97/04/01'), new TrafficUsage($user_a109, false, true, 200, '97/04/01'),
            new TrafficUsage($user_a109, true, false, 100, '97/05/01'), new TrafficUsage($user_a109, false, true, 300, '97/05/01'),
        ];

        return $traffic_usages;
    }
}
