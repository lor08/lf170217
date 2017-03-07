<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

class File extends Model
{

	public function scopeWithLoads($query, $onlineId)
	{
		return $query->where('load_id', $onlineId);
	}

	public function getTypeNameAttribute()
	{
		switch ($this->type) {
			case "url":
				return "Ссылка";
				break;
			case "file":
				return "Файл";
				break;
			default;
				break;
		}
	}

	public function getSizeAttribute()
	{
		switch ($this->type) {
			case "url":
				return "-";
				break;
			case "file":
				$bytes = \File::size($this->file);
				if ($bytes >= 1073741824)
					$bytes = number_format($bytes / 1073741824, 2) . ' GB';
				elseif ($bytes >= 1048576)
					$bytes = number_format($bytes / 1048576, 2) . ' MB';
				elseif ($bytes >= 1024)
					$bytes = number_format($bytes / 1024, 2) . ' kB';
				elseif ($bytes > 1)
					$bytes = $bytes . ' bytes';
				elseif ($bytes == 1)
					$bytes = $bytes . ' byte';
				else
					$bytes = '0 bytes';
				return $bytes;
				break;
			default;
				break;
		}
	}
}
