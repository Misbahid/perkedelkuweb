@extends('layout.index')
@section('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<?php
$content = $detail[0]->content;
?>
<div class="paddingtopcontentdetail">
    <div class="product_home cont_content">
        <div class="container" >
            <div class="row">
<!--                <div class="col-md-4">
                    <img src="{{URL::to("images/Cara Membuat Perkedelku.jpg")}}" class="detailimg_perkedelku">
                    <?php // echo "$video_url"?>
                </div>-->
                
                <div  class="col-md-8">
                    <span class="blisfull6">
                        <table>
                            <tr>
                                <td style="padding-top:130px;font-weight: bold;">
                                   
                                    •	Apa itu Perkedelku ?
                                   
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    Adonan Perkedel yang terbuat dari kentang asli dan siap saji dalam 10 menit, dilengkapi dengan bumbu dan sayuran kering (seledri dan wortel) serta protein nabati yang bermanfaat bagi tubuh.
                                   
                                   
                                </td>
                            </tr>
                             
                            <tr>
                                <td style="font-weight: bold;">
                                     •	Cara Pembuatan
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="{{URL::to("images/Cara Membuat Perkedelku.jpg")}}" class="detailimg_perkedelku">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">
                                    •	Higienis dan Halal Sertifikat2 MUI, BPOM, SAP, ISO, GMP

                                </td>
                            </tr>
                           
                        </table>
                        <?php // echo "$content" ?>
                    </span>
                </div>

            </div>

        </div>
    </div>
     </div>

    @endsection