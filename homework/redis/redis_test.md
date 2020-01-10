# Redis Homework

1. redis 中插入十条 student{id, name, age} 的数据。

    ```redis
    hmset student0 id 0 name stu0 age 20
    hmset student2 id 2 name stu2 age 22
    hmset student3 id 3 name stu3 age 31
    hmset student4 id 4 name stu4 age 24
    hmset student5 id 5 name stu5 age 21
    hmset student6 id 6 name stu6 age 26
    hmset student7 id 7 name stu7 age 23
    hmset student8 id 8 name stu8 age 24
    hmset student9 id 9 name stu9 age 27
    ```

2. redis 中记录 student 的投票次数，并执行加 1 和加 3 的操作。

    ```redis
    set tickets 10
    incr tickets
    incrby tickets 3
    ```
