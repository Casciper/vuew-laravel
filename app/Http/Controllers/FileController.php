<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use stdClass;

class FileController extends Controller
{
    public function show()
    {
        $file = file_get_contents(base_path() . '/users_profile');
        $arr = explode("\n", $file);
        $final = [];
        foreach ($arr as $item) {
            $slice = Str::betweenFirst($item, '"{', '}"');
            $json = str_replace("'", "", "$slice");
            $el = (array)json_decode("{" . $json . "}", true);
            $final[] = $el;
        }

        //test employee ask MaxBeach
        $test = [];
        foreach ($final as $item) {
            if(!isset($item['employee'])) {
                $test[] = $item;
            } else {
                $test[] = $item['employee'];
            }
        }
        dd($test);

        function look_for_array(array $test_var) {
            foreach ($test_var as $key => $el) {
                if (is_array($el)) {
                    return $key;
                }
            }
            return null;
        }

        $cellNames = [
            ['name' => 'uid', 'type' => 'A'],
            ['name' => 'role', 'type' => 'B'],
            ['name' => 'email', 'type' => 'C'],
            ['name' => 'photo', 'type' => 'D'],
            ['name' => 'isTest', 'type' => 'E'],
            ['name' => 'company', 'type' => 'F'],
            ['name' => 'manager', 'type' => 'G'],
            ['name' => 'employee', 'type' => 'H'],
            ['name' => 'fullName', 'type' => 'I'],
            ['name' => 'isActive', 'type' => 'J'],
            ['name' => 'lastName', 'type' => 'K'],
            ['name' => 'position', 'type' => 'L'],
            ['name' => 'username', 'type' => 'M'],
            ['name' => 'assistant', 'type' => 'N'],
            ['name' => 'birthDate', 'type' => 'O'],
            ['name' => 'firstName', 'type' => 'P'],
            ['name' => 'photoFull', 'type' => 'Q'],
            ['name' => 'department', 'type' => 'R'],
            ['name' => 'patronymic', 'type' => 'S'],
            ['name' => 'workPhones', 'type' => 'T'],
            ['name' => 'contractors', 'type' => 'U'],
            ['name' => 'managerName', 'type' => 'V'],
            ['name' => 'assistantName', 'type' => 'W'],
            ['name' => 'departmentUid', 'type' => 'X'],
            ['name' => 'internalPhone', 'type' => 'Y'],
            ['name' => 'organizations', 'type' => 'Z'],
            ['name' => 'employmentDate', 'type' => 'AA']
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($cellNames as $key => $name) {
            $sheet->setCellValue("${name['type']}1", $name['name']);
        }

        $i = 2;
        foreach ($final as $item) {
            foreach ($item as $key => $el) {
                foreach ($cellNames as $cellName) {
                    if ($key === $cellName['name']) {
                        if (is_array($el)) {
                            if(empty($el)){
                                $sheet->setCellValue($cellName['type'] . $i, 'null');
                            } else {

                                if(look_for_array($el) !== null){
                                    continue;
                                }

                                $sheet->setCellValue($cellName['type'] . $i, implode(',', $el));
                            }
                        } else {
                            $sheet->setCellValue($cellName['type'] . $i, $el);
                        }
                    }
                }
            }
            $i++;
        }

        //Фильтрация для каждой активной колонки
        $spreadsheet->getActiveSheet()->setAutoFilter(
            $spreadsheet->getActiveSheet()->calculateWorksheetDimension()
        );
        //Автоширина для каждой клетки
        foreach($cellNames as $cell)
        {
            $spreadsheet->getActiveSheet()->getColumnDimension($cell['type'])->setAutoSize(true);
        }

        $writer = new Xls($spreadsheet);
        $writer->save('hello world.xls');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="myfile.xls"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');

        return 111;
    }

}
