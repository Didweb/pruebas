#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Build'
  // -------------------------------
  stage ('Build'){
    echo '---------------------------------------'
    echo '             Build'
    echo '---------------------------------------'
    sh 'rm -rf *'
    sh 'rm -rf .git'
    checkout scm
    sh('git branch -av')
    sh('composer update')


  }

  // -------------------------------
  // ----- STAGE: 'Unit Test'
  // -------------------------------
  stage ('Unit Test'){
    echo '---------------------------------------'
    echo '             Unit Test'
    echo '---------------------------------------'
    sh 'pwd'
    sh('phpunit tests')

  }


  // -------------------------------
  // ----- STAGE: 'Deploy'
  // -------------------------------
  stage ('Deploy'){
    echo '---------------------------------------'
    echo '            Deploy'
    echo '---------------------------------------'
    sshagent (credentials: ['80b6539a-7a0e-4467-bd11-a3379e39fce2']) {
  //    sshagent (credentials: ['test-identity']) {
      //sh 'ssh -o StrictHostKeyChecking=no  uname -a'
      sh 'echo "<br> Test Ok " >> /home/eduardo.pinuaga-linares/web/index.html'
    //  sh 'git push  -u git@github.com:Didweb/pruebas.git test'

      // sh 'git push  origin test'
    }





  }




}
