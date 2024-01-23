<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Carbon;

class PlanController extends Controller
{
    public function index (){
        $plans = Plan::get();
        return view("plans" , compact("plans"));
    }

    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("subscription", compact("plan" , "intent"));
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
   
        if($plan->id == 1){
            $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
            ->create($request->token);
            $subscription->ends_at = Carbon::now()->addMonths();
            $subscription->name = $plan->name;
            $subscription->save();

        }elseif($plan->id == 2) {
            $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
            ->create($request->token);
            $subscription->ends_at = Carbon::now()->addMonths(6);
            $subscription->name = $plan->name;
            $subscription->save();

        }elseif($plan->id == 3){
            $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
            ->create($request->token);
            $subscription->ends_at = Carbon::now()->addYears();
            $subscription->name = $plan->name;
            $subscription->save();

        }else 
        {
            return redirect("dashboard");
        }



       
                        // $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->paymentMethod, [ 'email' => $user->email ]); 
                        


                        // $endDate = $subscription->ends_at;

        $subscribe = Subscription::where('user_id', auth()->id())->get();
        return redirect("dashboard");
    }
}
