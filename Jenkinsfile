#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Step_1'
  // -------------------------------
  stage 'Step_1'

  echo 'Configuration Variable'
  def var_1 = 'Hallo'
  def var_2 = 'Welt!'

  echo "var_1 '${var_1}' + var_2 '${var_2}' = '${var_1}' '${var_2}'"
  sh 'rm -rf *'
  checkout scm


  // -------------------------------
  // ----- STAGE: 'Step_2'
  // -------------------------------
  stage 'Step_2'

  echo "Hallo, dass es ist Step2"
  sh 'git branch -av'
  sh 'git pull'
  sh 'git branch -av'
  sh 'git checkout TestOK'
  sh 'git merge origin/master'
  sh 'git show-ref'
  sh 'git push origin  refs/remotes/origin/dev'



  // -------------------------------
  // ----- STAGE: 'Step_3'
  // -------------------------------
  stage 'Step_3'

  echo "Hallo, dass es ist Step3"

}
