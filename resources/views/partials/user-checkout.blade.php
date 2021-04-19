<form action="{{route('order.store')}}" method="post" id="checkout-form">
      @csrf
    <fieldset>
        <h2 class="login-title mb-3">{{__('Billing details')}}</h2>
        <div class="row">
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                <label for="firstname">{{__('First Name')}}<span>*</span></label>
                <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->info->first_name}}" id="firstname" type="text" required>
                @if($errors->has('first_name'))
                  @foreach($errors->get('first_name') as $message)
                    <span style="color:red">{{$message}}</span>
                  @endforeach
                @endif
            </div>
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
               <label for="lastname">{{__('Last Name')}}<span>*</span></label>
                <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->info->last_name}}" id="lastname" type="text" required>
                @if($errors->has('last_name'))
                  @foreach($errors->get('last_name') as $message)
                    <span style="color:red">{{$message}}</span>
                  @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                 <label for="email">{{__('Email Address')}}<span>*</span></label>
                <span class="form-control bs_disabled_email">{{Auth::user()->email}} <a href="{{url('my-account/settings')}}">Change</a></span> 
                @if($errors->has('email'))
                  @foreach($errors->get('email') as $message)
                    <span style="color:red">{{$message}}</span>
                  @endforeach
                @endif
            </div>
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                <label for="phone">{{__('Phone')}}<span>*</span></label>
                <input class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->info->phone }}" type="tele" id="phone" required>
                @if($errors->has('phone'))
                  @foreach($errors->get('phone') as $message)
                    <span style="color:red">{{$message}}</span>
                  @endforeach
                @endif
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="row">
            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                 <label for="address">{{__('Address')}}<span>*</span></label>
                 <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Write your full address please..." required>{{ Auth::user()->info->address }}</textarea>
                 @if($errors->has('address'))
                  @foreach($errors->get('address') as $message)
                    <span style="color:red">{{$message}}</span>
                  @endforeach
				@endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 col-lg-6 col-xl-6">
            	<label for="country">{{__('Country')}}</label>
                <select name="country_id" id="country" class="form-control bs_countries" required>
                  <option value="">{{__('Select Country')}}</option>
                  @foreach(App\Country::all() as $country)
                    @if($country->id == Auth::user()->info->country_id)
                      <option value="{{$country->id}}" selected>{{ucwords($country->country_name)}}</option>
                    @else
                      <option value="{{$country->id}}">{{ucwords($country->country_name)}}</option>
                    @endif
                  @endforeach
                </select>
                @if($errors->has('country_id'))
                    @foreach($errors->get('country_id') as $message)
                      <span style="color:red">{{$message}}</span>
                    @endforeach
                 @endif   
            </div>
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
            	<label for="state">{{__('Region')}} / {{__('State')}}</label>
                <select name="state_id" id="state" class="form-control bs_states" required>
                  
                </select>
                @if($errors->has('state_id'))
                    @foreach($errors->get('state_id') as $message)
                      <span style="color:red">{{$message}}</span>
                    @endforeach
                 @endif
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                <label for="city">{{__('City')}}</label>
                <select name="city_id" id="city" class="form-control bs_cities" required>
                </select>
                @if($errors->has('city_id'))
                    @foreach($errors->get('city_id') as $message)
                      <span style="color:red">{{$message}}</span>
                    @endforeach
                 @endif
            </div>
            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                <label for="input-postcode">{{__('Post Code')}} <span class="required-f">*</span></label>
                <input name="postal_code" value="" class="form-control" id="input-postcode" type="text" required>
                @if($errors->has('postal_code'))
                    @foreach($errors->get('postal_code') as $message)
                      <span style="color:red">{{$message}}</span>
                    @endforeach
                 @endif
            </div>
        </div>
    </fieldset>


    <fieldset>
        <div class="row">
            <div class="form-group col-md-12 col-lg-12 col-xl-12">
                <label for="input-company">{{__('Order Notes')}} <span class="required-f">*</span></label>
                <textarea class="form-control resize-both" name="customer_note" rows="3"></textarea>
            </div>
        </div>
    </fieldset>
</form>