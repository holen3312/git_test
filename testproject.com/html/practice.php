<pre>
<?php

class Worker
{
    private static array $workers;
    public static $i = 0;

    public static function create(array $worker)
    {
        if (count($worker) === 4) {
            self::$i++;
            self::save($worker);
            self::$workers[self::$i] = [
                "name" => $worker[0],
                "email" => $worker[1],
                "age" => $worker[2],
                "profession" => $worker[3],
//                "time" => time()
            ];
        }
        return self::$workers;
    }

    public static function all()
    {
        return [
                "workers_count" => count(self::$workers),
                "all_workers" => self::$workers
            ];
    }

    public static function save(array $worker)
    {
        file_put_contents(
                "workers.txt",
                'Name: ' . $worker[0] . '</n> 
                        Email: ' . $worker[1] . '</n>',
                FILE_APPEND
        );
    }

    public static function getWorkers()
    {
        return self::$workers;
    }

}
Worker::create(['Arfem', 'gghjgj', 297, 'jopa']);
Worker::create(['Ardddfem', 'gghjddgj', 29, 'jopa']);
Worker::create(['Arfefjkvyhukvyggm', 'gghjgj', 29007, 'jopa']);
//var_dump(Worker::getWorkers());
var_dump(Worker::all());
?>
    </pre>
