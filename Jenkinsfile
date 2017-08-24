#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Pull'
  // -------------------------------
  stage ('Pull'){
    echo 'Machen PULL'
    sh 'rm -rf *'
    checkout scm

  }

  // -------------------------------
  // ----- STAGE: 'Test'
  // -------------------------------
  stage ('Test'){
    echo "Test"

  }


  // -------------------------------
  // ----- STAGE: 'Merge to Test'
  // -------------------------------
  stage ('Merge_To_Test'){
      echo "Merge To Test"
      sh('git status')
      sh('git checkout  test')
      sh('git merge  test')
  }

  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "Merge To Test"
      withCredentials([usernamePassword(
        credentialsId: 'git-pass-credentials-ID',
        passwordVariable: 'GIT_PASSWORD',
        usernameVariable: 'GIT_USERNAME')]) {
          sh("git tag -a some_tag -m 'Jenkins'")
          sh('git push https://${GIT_USERNAME}:${GIT_PASSWORD}@<REPO> --tags')
      }

      // For SSH private key authentication, try the sshagent step from the SSH Agent plugin.
      sshagent (credentials: ['git-ssh-credentials-ID']) {
          sh("git tag -a some_tag -m 'Jenkins'")
          sh('git push <REPO> --tags')
      }

 }

}
