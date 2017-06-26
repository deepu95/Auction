<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Winner extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'winner';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Winner is gonna be decided.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()

	{

          $sts=Auction::get();
          $mytime = Carbon\Carbon::now();		
          $mytime->addHours(5);		
          $mytime->addMinutes(30);	
         $cdate = date('Y-m-d');		
         $this->info($mytime->toTimeString());
         $fdate=Carbon\Carbon::now();
         $fdate->addDay(1);

   foreach ($sts as $st) {

   	if($cdate > $st->end_date && $st->last_bid_price >= $st->reserved_price)
   	{
   		DB::table('auctions_info')->where('id',$st->id)->update(array('status'=>'Closed'));
   		$person=Bid::select('user_id','bid_amount','auction_name')->where('auction_id','=',$st->id)->where('bid_amount','=',$st->last_bid_price)->get();
                   $this->info($person);

   	}
   	else if($cdate == $st->end_date && $mytime>$st->end_time &&  $st->last_bid_price >= $st->reserved_price )
   	{
        DB::table('auctions_info')->where('id',$st->id)->update(array('status'=>'Closed'));
        $person=Bid::select('user_id','bid_amount','auction_name')->where('auction_id','=',$st->id)->where('bid_amount','=',$st->last_bid_price)->get();
                   $this->info($person);
   	}

   	else if($cdate > $st->end_date && $st->last_bid_price < $st->reserved_price)
   	{
   		 DB::table('auctions_info')->where('id',$st->id)->update(array('end_date'=>$fdate->toDateString(), 'end_time'=>$mytime->toTimeString()));


   	}

   	else if($cdate == $st->end_date && $mytime>$st->end_time &&  $st->last_bid_price < $st->reserved_price )
   	{
        DB::table('auctions_info')->where('id',$st->id)->update(array('end_date'=>$fdate->toDateString(), 'end_time'=>$mytime->toTimeString()));
   	}
      else
      {
      	DB::table('auctions_info')->where('id',$st->id)->update(array('status'=>'Active'));
      }

   	}
   

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		/*return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);*/
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		/*return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);*/
		return [];
	}

}
