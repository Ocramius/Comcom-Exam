<?php
namespace Comcom\Exam;

/**
 * Describes a simple Exam, or a set of steps the user has to take in order to
 * get an evaluation of a provided examined topic. A sample exam could be a set
 * of steps in which the user should take decisions or perform 
 * tasks that get evaluated during or at the end of it
 *
 * @author ocramius
 */
interface Exam {

    public function getExamPartecipant();
    
    public function getExamSteps();
    
    public function getCurrentExamStep();
    
    public function setCurrentExamStep();
    
    public function nextExamStep();
    
    public function isExamStarted();
    
    public function isExamCompleted();
    
    public function isExamAborted();
    
    public function getExamEvaluation();
    
    public function resetExam();
}