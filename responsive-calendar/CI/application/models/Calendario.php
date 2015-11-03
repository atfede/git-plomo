<?php

class Calendario extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->config = array(
            'start_day' => 'monday',
            'show_next_prev' => TRUE,
//            'next_prev_url' => base_url() . 'index.php/CalendarioController/displayCalendar'
            'next_prev_url' => 'http://www.plomo.6te.net/CI/index.php/CalendarioController/displayCalendar'
        );

        $this->config['template'] = '{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
            <div class="day_num">{day}</div>
            <div class="content">{content}</div>
        {/cal_cell_content}
        {cal_cell_content_today}
            <div class="day_num highlight">{day}</div>
            <div class="content">{content}</div>
        {/cal_cell_content_today}

        {cal_cell_no_content}
            <div class="day_num">{day}</div>
        {/cal_cell_no_content}
        
        {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}';
    }

    function get_eventos($year, $month) {
//        $query = $this->db->select('fecha', 'evento')->from('calendario')
//                ->like('fecha', "$year-$month", 'after')->get(); //fecha LIKE  "2010-02%" 
//        

        $query = $this->db->select('fecha', 'evento')->from('calendario')
                        //       ->where("column LIKE %$keyword%")->get();
                        ->where("fecha LIKE %$year-$month%")->get();

        $cal_data = array();

        foreach ($query->result() as $row) {
            $cal_data[substr($row->fecha, 8, 2)] = $row->evento; //2010-02-22 //si quiero el dia hago substring de position 8 (22) y quiero dos characters  
        }
        return $cal_data;
    }

    function add_calendar_data($date, $data) {
        if ($this->db->select('fecha')->from('calendario')
                        ->where('fecha', $date)->count_all_results()) {

            $this->db->where('fecha', $date)
                    ->update('calendario', array(
                        'fecha' => $date,
                        'evento' => $data
            ));
        } else {
            $this->db->insert('calendario', array(
                'fecha' => $date,
                'evento' => $data
            ));
        }
    }

    function generate($year, $month) {

        $this->load->library('calendar', $this->config);

        $cal_data = array(
            15 => 'foo',
            17 => 'bar'
        );
        
        

//        $this->add_calendar_data('2015-10-29', 'Pruebaaa');
//        $cal_data = $this->get_eventos($year, $month);

        return $this->calendar->generate($year, $month, $cal_data);
    }

}

//27:20 minuto