<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll($filters = [])
    {
        $qb = Product::select('*');

        if (isset($filters['name'])) {
            $qb->where('name', 'like', '%' . $filters['name'] . '%');
        }
        
        //$qb->dd();
        
        if (isset($filters['color'])) {
            $qb->where('name', 'like', '%' . $filters['name'] . '%');
        }

        $order = isset($filters['order']) ? $filters['order'] : 'created_at';
        $sort = isset($filters['sort']) ? $filters['sort'] : 'asc';

       //$total = $qb->count();

        //$qb->skip(0)->take(15)
        //return [
        //    'total' => $total,
        //    'items' => $qb->skip(0)->take(15)->get()
        //];

        return $qb->orderBy($order, $sort)->paginate(15);
    }

    public function find($id)
    {
        return Product::find($id);
    }


}