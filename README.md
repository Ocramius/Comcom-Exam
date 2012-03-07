# Comcom Exam

This library aims at abstracting an exam/test procedure taken by a user by 
providing interfaces and simple logic with the most decoupled possible approach.

## Exam definition - RFC

An examination, as of it's definition is:
    
 > examination: a set of questions or exercises evaluating skill or knowledge;
 >> "when the test was stolen the professor had to make a new set of questions"

So what we are here defining is a basic set of requirements of an exam component

## Exam Interface

An User must just implement the user interface.

### An Exam must fit with following conditions:

 -   have an assigned user
 -   provide a description of itself (`ViewModel` or other serializations to be 
     decided).
 -   provide its status (`getStatus` providing `'initialized'`, `'completed'` or 
     `'aborted'`?).
 -   allow a user to start it (`start` method?)
 -   allow a user to quit it (`abort` method?)
 -   allow a user to complete it (`end` method?)
 -   allow the user to iterate over its steps (implement the `Iterator` interface)
 -   allow the user to move to an arbitrary step
 -   allow getting an evaluation

### Single steps of an exam must fit with following conditions:

 -   provide description of itself
 -   allow reading it (and implicitly set status?)
 -   allow getting its status (`'visited'`, `'answered'`, `'clean'`) ?
 -   allow setting an answer
 -   allow getting its answer
 -   allow getting an evaluation

## Exam Events

Following events have to be triggered during the default workflow of an
examination and associated examples that could benefit by them through an event
listener:

 -   `exam.create` exam is created
      -   send an email to a user, telling him that he has to take the exam
 -   `exam.status` exam status is modified
      -   send notifications about the status of the exam to a supervisor
 -   `exam.start` exam user starts the exam
      -   log data about the user
 -   `exam.end` exam is completed
      -   send a detailed report to a supervisor
      -   assign privileges to a user that fits some requirements
      -   generate and send a report
 -   `exam.abort` exam is aborted
      -   send detailed report to a supervisor
      -   revoke access to the test
      -   warn user through an email
   through an email)
 -   `exam.iterate` exam step is fetched
      -   trigger evaluation on iterated steps
      -   log movements of the user
      -   send report emails in case of "trap" questions or strange 
          patterns (bots)
 -   `exam.evaluate` exam evaluation is generated
      -   send copies of the report to supervisors
      -   use evaluation to trigger further exam instantiation for specific
          skill checking
 -   `examstep.status` exam step status is changed
      -   check against mandatory questions flags, like "must visit question 12"
      -   generate reporting on the fly for custom steps
 -   `examstep.visit` exam step is visited
      -   flag the exam as passed when a set of conditions is met
      -   start preloading data for a specific service used during the step
 -   `examstep.answer` exam step is answered
      -   generate evaluation for the question, skip to the next question
      -   automatically, trigger automatic exam completion when a minimum number
          of given answers is met
 -   `examstep.evaluate` exam step evaluation is generated
      -   update rendered evaluation of the exam, re-trigger complete evaluation
          the exam
      -   send emails in case of critical steps failed
      -   trigger displaying of messages to encourage or confuse the user