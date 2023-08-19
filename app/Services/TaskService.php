<?php

namespace App\Services;

use App\Models\Task;

class TaskService {


    public function fetchAll() {
        return Task::select('id','name','description','start_in','deadline')->get();
    }

    public function store($data) {
        return Task::create($data);
    }

    public function view($id) {
        return Task::whereId($id)->first();
    }

    public function update($data, $id) {
        return Task::whereId($id)->update($data);
    }

    public function destroy($id) {
        return Task::whereId($id)->delete();
    }

}
?>
