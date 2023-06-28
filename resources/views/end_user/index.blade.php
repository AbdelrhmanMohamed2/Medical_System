@extends('end_user.partials.master')

@section('title', ' | Home')
@section('site_name', $settings['Website Name'])

{{-- $settings[''] --}}

{{-- ######################## start hero ####################### --}}
@section('hero_title', $settings['hero_title'])
@section('hero_description', $settings['hero_description'])
@section('why_question', $settings['why_question'])
@section('why_answer', $settings['why_answer'])

@section('card_one_title', $settings['card_one_title'])
@section('card_one_description', $settings['card_one_description'])

@section('card_two_title', $settings['card_two_title'])
@section('card_two_description',$settings['card_two_description'])

@section('card_three_title', $settings['card_three_title'])
@section('card_three_description', $settings['card_three_description'])
{{-- ######################## end hero ####################### --}}

{{-- ######################## start about ####################### --}}
@section('about_video', $settings['about_video'])
@section('about_title', $settings['about_title'])
@section('about_description', $settings['about_description'])

@section('about_box-one_title', $settings['about_box-one_title'])
@section('about_box-one_description', $settings['about_box-one_description'])
@section('about_box-two_title', $settings['about_box-two_title'])
@section('about_box-two_description', $settings['about_box-two_description'])
@section('about_box-three_title', $settings['about_box-three_title'])
@section('about_box-three_description', $settings['about_box-three_description'])
{{-- ######################## end about ####################### --}}

{{-- ######################## start counters  ####################### --}}
@section('counter_one_title', $settings['counter_one_title'])
@section('counter_one_count', $settings['counter_one_count'])

@section('counter_two_title', $settings['counter_two_title'])
@section('counter_two_count', $settings['counter_two_count'])

@section('counter_three_title', $settings['counter_three_title'])
@section('counter_three_count', $settings['counter_three_count'])

@section('counter_four_title', $settings['counter_four_title'])
@section('counter_four_count', $settings['counter_four_count'])
{{-- ######################## end counters  ####################### --}}

{{-- ######################## start  ####################### --}}
@section('doctors_description', $settings['doctors_description'])
{{-- ######################## end  ####################### --}}

{{-- ######################## start department  ####################### --}}
@section('department_description', $settings['department_description'])
{{-- ######################## end department  ####################### --}}



@section('css')
@endsection

@section('scripts')
@endsection



@section('address', $settings['address'])
@section('phone', $settings['phone'])
@section('email', $settings['email'])

