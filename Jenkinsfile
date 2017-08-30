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

    //     sshagent(['test-identity']) {
    //     // some block
    // }
    //     sshagent (credentials: ['epl_acceso_ssh']) {
    //   //    sshagent (credentials: ['test-identity']) {
    //       //sh 'ssh -o StrictHostKeyChecking=no  uname -a'
    //       sh 'touch miarchivoSHH.txt'
    //       sh 'echo "<br> Test Ok " >> miarchivoSHH.txt '
    //
    // sh 'scp -B -o StrictHostKeyChecking=no  miarchivoSHH.txt  eduardo.pinuaga-linares@144.76.212.29:home/eduardo.pinuaga-linares/web/'
    //
    //     //  sh 'git push  -u git@github.com:Didweb/pruebas.git test'
    //
    //       // sh 'git push  origin test'
    //     }

git branch: '${BRANCH_NAME}', credentialsId: 'test-identity', url: 'https://github.com/Didweb/pruebas.git'
    sh ('git branch -av')
    sh ('git checkout -b test')
    sh ('git merge  ${BRANCH_NAME}')
    sh ('git branch -av')

    withCredentials([usernamePassword(credentialsId: '29465d95-fb54-4b02-96e2-419565ccc90a', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
      // available as an env variable, but will be masked if you try to print it out any which way
      sh 'echo $PASSWORD'
      // also available as a Groovy variable—note double quotes for string interpolation
      echo "$USERNAME"
      sh ('git push https://${USERNAME}:${PASSWORD}@github.com/Didweb/pruebas.git test')
    }

// git push: 'test', credentialsId: 'test-identity', url: 'https://github.com/Didweb/pruebas.git'





  }




}
