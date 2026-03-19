<?php
// natacion-analisis.php

// Function to convert time from 25m to 50m events
function convert25mTo50m($time) {
    // Assuming a simple conversion where the 50m time is roughly double the 25m time
    return $time * 2;
}

// Improved renderT function
function renderT($data) {
    foreach ($data as $key => $value) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($key) . "</td>";
        echo "<td>" . htmlspecialchars($value) . "</td>";
        echo "</tr>";
    }
}

// Example functionality for merging data
function _pushMerged($swimmerData) {
    // Logic for merging swimmer data
    // This is just a placeholder for merge implementation
    return array_merge(...$swimmerData);
}

// Main function to analyze swimming competition results
function analyzeSwimmingCompetition($results) {
    $convertedResults = [];
    
    foreach ($results as $result) {
        $convertedTime = convert25mTo50m($result['time']);
        $convertedResults[] = [
            'swimmer' => $result['swimmer'],
            'time' => $convertedTime,
            'event' => $result['event']
        ];
    }

    // Render results (assumed to be in a web environment)
    echo "<table>";
    echo "<tr><th>Swimmer</th><th>Time (50m)</th><th>Event</th></tr>";
    renderT($convertedResults);
    echo "</table>";
}

// Example usage
$results = [
    ['swimmer' => 'John Doe', 'time' => 30, 'event' => '25m Freestyle'],
    ['swimmer' => 'Jane Smith', 'time' => 28, 'event' => '25m Freestyle'],
];

analyzeSwimmingCompetition($results);

?>