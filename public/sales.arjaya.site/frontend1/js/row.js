
                                        $(document).ready(function() {
                                            $('#searchitem').on('keyup', function() {
                                                var query = $(this).val();
                                                if (query !== '') {
                                                    $.ajax({
                                                        url: '/searchitem',
                                                        method: 'GET',
                                                        data: {
                                                            query: query
                                                        },
                                                        success: function(data) {
                                                            $('#search-resultsitem').html(data);
                                                        }
                                                    });
                                                } else {
                                                    $('#search-resultsitem').html('');
                                                }
                                            });
                                        });
