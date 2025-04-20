@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Added Report</h4>
                <h6>Manage your Product Added Report</h6>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <form action="" method="get">
                    <div class="pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Start Date" required
                                        name="from_date" value="{{ \Carbon\Carbon::parse($fromDate)->format('d-m-Y') }}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose End Date" required
                                        name="to_date" value="{{ \Carbon\Carbon::parse($toDate)->format('d-m-Y') }}">
                                </div>
                            </div>
                            <div class="col-lg-2 ">
                                <div class="form-group w-100">
                                    <button type="submit" class="btn btn-filters d-inline-block"
                                        onclick="this.form.target='';"
                                    >
                                        <img
                                            src="{{ asset('backend') }}/img/icons/search-whites.svg" alt="img">
                                    </button>
                                    <button type="submit" class="btn btn-info" onclick="this.form.target='_blank';" name="print" value="1">
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                        Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($updates ?? null)
                <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 5px" cellspacing="0" class="border">
                    <thead>
                        <tr style="height: 20pt;">
                            <td
                                style="
                                    width: 36pt;
                                    border-top-style: solid;
                                    border-top-width: 1pt;
                                    border-top-color: #959595;
                                    border-left-style: solid;
                                    border-left-width: 1pt;
                                    border-left-color: #959595;
                                    border-bottom-style: solid;
                                    border-bottom-width: 1pt;
                                    border-bottom-color: #959595;
                                    border-right-style: solid;
                                    border-right-width: 1pt;
                                    border-right-color: #959595;
                                "
                                bgcolor="#EFEFEF"
                            >
                                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">S.L</p>
                            </td>
                            <td
                                style="
                                    width: 66pt;
                                    border-top-style: solid;
                                    border-top-width: 1pt;
                                    border-top-color: #959595;
                                    border-left-style: solid;
                                    border-left-width: 1pt;
                                    border-left-color: #959595;
                                    border-bottom-style: solid;
                                    border-bottom-width: 1pt;
                                    border-bottom-color: #959595;
                                    border-right-style: solid;
                                    border-right-width: 1pt;
                                    border-right-color: #959595;
                                "
                                bgcolor="#EFEFEF"
                            >
                                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Date</p>
                            </td>
                            <td
                                style="
                                    width: 46pt;
                                    border-top-style: solid;
                                    border-top-width: 1pt;
                                    border-top-color: #959595;
                                    border-left-style: solid;
                                    border-left-width: 1pt;
                                    border-left-color: #959595;
                                    border-bottom-style: solid;
                                    border-bottom-width: 1pt;
                                    border-bottom-color: #959595;
                                    border-right-style: solid;
                                    border-right-width: 1pt;
                                    border-right-color: #959595;
                                "
                                bgcolor="#EFEFEF"
                            >
                                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Item Code</p>
                            </td>
                            <td
                                style="
                                    width: 218pt;
                                    border-top-style: solid;
                                    border-top-width: 1pt;
                                    border-top-color: #959595;
                                    border-left-style: solid;
                                    border-left-width: 1pt;
                                    border-left-color: #959595;
                                    border-bottom-style: solid;
                                    border-bottom-width: 1pt;
                                    border-bottom-color: #959595;
                                    border-right-style: solid;
                                    border-right-width: 1pt;
                                    border-right-color: #959595;
                                "
                                bgcolor="#EFEFEF"
                            >
                                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Product Name</p>
                            </td>
                            <td
                                style="
                                    width: 50pt;
                                    border-top-style: solid;
                                    border-top-width: 1pt;
                                    border-top-color: #959595;
                                    border-left-style: solid;
                                    border-left-width: 1pt;
                                    border-left-color: #959595;
                                    border-bottom-style: solid;
                                    border-bottom-width: 1pt;
                                    border-bottom-color: #959595;
                                    border-right-style: solid;
                                    border-right-width: 1pt;
                                    border-right-color: #959595;
                                "
                                bgcolor="#EFEFEF"
                            >
                                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                                    Quantity
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($updates as $update)
                            <tr style="height: 17pt;">
                                <td style="padding: 5px; text-align: center;">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    {{ $update->created_at->format('d-m-Y') }}
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    {{ $update->product->code }}
                                </td>
                                <td style="text-align: left; padding: 5px;">
                                    {{ $update->product->name }}
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    {{ $update->quantity }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    // $('table').DataTable({ pageLength: 100,
    //     });
</script>
@endsection