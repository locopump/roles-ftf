<?php

namespace App\Models\Repositories\Publico\User;

use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    public function register(array $data) {
        $id = DB::table('public.user')
            ->insertGetId($data);

        return $id;
    }

    public function update(array $data, int $id) {
        $affected_rows = DB::table('public.user')
            ->where('id', $id)
            ->update($data);

        return $affected_rows;
    }

    public function getAll()
    {
        $data = DB::table('public.user')
            ->get();

        return $data;
    }

    public function getRow(int $id)
    {
        $data = DB::table('public.user')
            ->where('id', $id)
            ->first();

        return $data;
    }

    public function delete(int $id) {
        $affected_rows = DB::table('public.user')
            ->where('id', $id)
            ->delete();

        return $affected_rows;
    }

}
