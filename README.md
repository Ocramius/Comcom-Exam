Comcom Exam
=====

This library aims at abstracting an exam/test procedure taken by a user by 
providing interfaces and simple logic with the most decoupled possible approach.

Exam definition - RFC
=====

An examination, as of it's definition is:
    
 > examination: a set of questions or exercises evaluating skill or knowledge;
 > > "when the test was stolen the professor had to make a new set of questions"

So what we are here defining is a basic set of requirements of an exam component

Exam Interface
=====

An User must just implement the user interface.

An Exam must fit with following conditions:

 - must have an assigned user
 - provide a description of itself (`ViewModel` or other serializations to be 
   decided).
 - provide its status (`getStatus` providing `'initialized'`, `'completed'` or 
   `'aborted'`?).
 - allow a user to start it (`start` method?)
 - allow a user to quit it (`abort` method?)
 - allow a user to complete it (`end` method?)
 - allow the user to iterate over its steps (implement the `Iterator` interface)
 - allow the user to move to an arbitrary step
 - allow getting an evaluation

Single steps of an exam must fit with following conditions:

 - provide description of itself
 - allow reading it (and implicitly set status?)
 - allow getting its status (`'visited'`, `'answered'`, `'clean'`) ?
 - allow setting an answer
 - allow getting its answer
 - allow getting an evaluation

Exam Events
=====

Following events have to be triggered during the default workflow of an
examination:

 - `'exam.create'` - exam is created
 - `'exam.status'` - exam status is modified
 - `'exam.start'` - exam user starts the exam
 - `'exam.end'` - exam is completed
 - `'exam.abort'` - exam is aborted
 - `'exam.iterate'` - exam step is fetched
 - `'exam.evaluate'` - exam evaluation is generated
 - `'examstep.status'` - exam step status is changed
 - `'examstep.visit'` - exam step is visited
 - `'examstep.answer'` - exam step is answered
 - `'examstep.evaluate'` - exam step evaluation is generated