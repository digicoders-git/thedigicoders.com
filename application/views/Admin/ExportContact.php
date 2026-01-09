<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Contacts - The DigiCoders</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
		<h2 class="mb-4">Export Contacts </h2>
		
		
		<button id="exportBtn" class="btn btn-primary ">Export to vCard [<?= count($accepttdata) ?> Contacts] </button>
				
		<br/><br/>
		
        <table id="example" class="display table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                </tr>
            </thead>
            <tbody>
				<?php
				foreach($accepttdata as $student) 
				{
				?>
				<tr>
                    <td>
					<?php
						
						$name = strtolower($student->student_name);
						$name = ucwords($name); 
						$name = trim($name);
						$title = "";
						
						if($student->training_type == "Summer Training" )
						{
							$title = "DCT ST-25";
						}
						else if($student->training_type == "Apprenticeship Training" )
						{
							$title = "DCT App-25";
						} 
						else
						{
							$title = "DCT Trainee-25";
						}
						$title = trim($title);
						
						$fullname = $name." ".$title;
						
						echo trim($fullname);
						
					?>
					</td>
					
                    <td>
						<?= $student->mobile ?> 
					</td>
                </tr>
				
				<?php
				}
				?>
				
            </tbody>
        </table>
		
		
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
			});
		
		
		function tableToVCard() {
            let vCardData = '';
            $('#example tbody tr').each(function() {
                let name = $(this).find('td').eq(0).text();
				
				name = name.replace(/\s+/g, ' ');
				
                const mobile = $(this).find('td').eq(1).text();
                vCardData += `BEGIN:VCARD\nVERSION:3.0\nFN:${name}\nTEL:${mobile}\nEND:VCARD\n`;
            });
            return vCardData;
        }
		
		function getFormattedDate() {
		
            const date = new Date();
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const year = date.getFullYear();
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const formattedHours = hours % 12 || 12; // Convert 24-hour to 12-hour format

            return `Contacts-TheDigiCoders-${day}-${month}-${year} ${formattedHours}:${minutes} ${ampm}`;
        }


        $(document).ready(function() {
            $('#exportBtn').click(function() {
			
                const vCardData = tableToVCard();
                const blob = new Blob([vCardData], { type: 'text/vcard' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
				
                a.download = `${getFormattedDate()}.vcf`;
                
				document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
				
            });
        });
		
		
    </script>
</body>
</html>
