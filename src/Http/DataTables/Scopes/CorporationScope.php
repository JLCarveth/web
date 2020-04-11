<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015 to 2020 Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Web\Http\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

/**
 * Class CorporationScope.
 *
 * This is a generic scope for corporation tables.
 * It will restrict returned data based on both requested corporation ID.
 *
 * @package Seat\Web\Http\DataTables\Scopes
 */
class CorporationScope implements DataTableScope
{
    /**
     * @var array
     */
    private $corporation_ids = [];

    /**
     * CorporationScope constructor.
     *
     * @param array $corporation_ids
     */
    public function __construct(array $corporation_ids)
    {
        $this->corporation_ids = $corporation_ids;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->whereIn('corporation_id', $this->corporation_ids);
    }
}
