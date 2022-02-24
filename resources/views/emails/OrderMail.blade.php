<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hashtag9</title>
</head>
<body>
    {{-- Array of Objects --}}
    <h1>{{ $details['title'] }}</h1>
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >Total</th>
                                <th >description</th>
                                <th >Status</th>
                                <th >Quantity</th>
                                <th >Ordered at</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th>
                                        {{ $details['id'] }}
                                    </th>
                                    <td>
                                        {{ $details['total'] }}
                                    </td>
                                    <td>
                                        {{ $details['description'] }}
                                    </td>
                                    <td>
                                        {{ $details['status'] }}
                                    </td>
                                    <td>
                                        {{ $details['quantity'] }}
                                    </td>
                                    <td>
                                        {{ $details['created_at'] }}
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <p>Thank you</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>