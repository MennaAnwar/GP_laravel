<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Process;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function test(Request $request) {
        // Get the Python script path from the .env file
        $scriptPath = env('PUBLISHER_SCRIPT');

        // Extract the 'state' query parameter from the request
        $argument = $request["x"];

        // Ensure the script path and argument are safely escaped for shell command
        $safeScriptPath = escapeshellarg($scriptPath);
        $safeArgument = escapeshellarg($argument);

        // Construct the command
        $command = "/bin/bash -c 'source /opt/ros/noetic/setup.bash  && source ~/my_ws/devel/setup.bash && rosrun torta_web_control button_pub.py hello'";

        // Execute the command
        $result = shell_exec($command);
        return $result;
    }

    public function position_test(Request $request) {
        // Get the Python script path from the .env file
        $scriptPath = env('POSITION_SCRIPT');

        // Extract the 'x', 'y', and 'theta' parameters from the request
        $x = $request['x'];
        $y = $request['y'];
        $theta = $request['theta'];

        // Ensure the script path and arguments are safely escaped for the shell command
        $ScriptPath = escapeshellarg($scriptPath);
        $X = escapeshellarg($x);
        $Y = escapeshellarg($y);
        $Theta = escapeshellarg($theta);

        // Construct the command
        $command = "/bin/bash -c 'source /opt/ros/noetic/setup.bash  && source ~/my_ws/devel/setup.bash && rosrun torta_web_control $ScriptPath $X $Y $Theta'";

        // Execute the command
        $result = shell_exec($command);
        return $result;
    }

    public function velocity_test(Request $request) {
        // Get the Python script path from the .env file
        $scriptPath = env('VELOCITY_SCRIPT');

        // Extract the 'x', 'y', and 'theta' parameters from the request
        $x = $request['x'];
        $y = $request['y'];
        $theta = $request['theta'];

        // Ensure the script path and arguments are safely escaped for the shell command
        $ScriptPath = escapeshellarg($scriptPath);
        $X = escapeshellarg($x);
        $Y = escapeshellarg($y);
        $Theta = escapeshellarg($theta);

        // Construct the command
        $command = "/bin/bash -c 'source /opt/ros/noetic/setup.bash  && source ~/my_ws/devel/setup.bash && rosrun torta_web_control $ScriptPath $X $Y $Theta'";

        // Execute the command
        $result = shell_exec($command);
        return $result;
    }

    public function PID_test(Request $request) {
        // Get the Python script path from the .env file
        $scriptPath = env('PID_SCRIPT');

        // Extract the 'x', 'y', and 'theta' parameters from the request
        $kp = $request['kp'];
        $ki = $request['ki'];
        $kd = $request['kd'];

        // Ensure the script path and arguments are safely escaped for the shell command
        $ScriptPath = escapeshellarg($scriptPath);
        $KP = escapeshellarg($kp);
        $KI = escapeshellarg($ki);
        $KD = escapeshellarg($kd);

        // Construct the command
        $command = "/bin/bash -c 'source /opt/ros/noetic/setup.bash  && source ~/my_ws/devel/setup.bash && rosrun torta_web_control $ScriptPath $KP $KI $KD'";

        // Execute the command
        $result = shell_exec($command);
        return $result;
    }
}