<?php

namespace App\Repositories;

interface DetailTransaksiRepositoryInterface
{
    /**
     * Get's a record by it's ID
     *
     * @param int
     */
    public function getItems();

    /**
     * Get's all records.
     *
     * @return mixed
     */
    public function insert($request);

    /**
     * Deletes a record.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a record.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);

    
}
